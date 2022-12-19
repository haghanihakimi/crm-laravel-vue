<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Models\Invoice;
use App\Models\InvoiceOrder;
use App\Models\InvoiceCustomer;
use App\Models\InvoiceProduct;
use App\Http\Controllers\General\CountriesController as Countries;
use Inertia\Inertia;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    /**
     * List of invoices view
     * @return Inertia\Inertia
     */
    public function index (Request $request) {
        $request->validate([
            'page' => ['nullable', 'numeric', 'min:1', 'regex:/(^([0-9]+)(\d+)?$)/u'],
            'sort' => ['nullable', 'string', 'regex:/(^([a-zA-Z]+)(\d+)?$)/u']
        ]);

        return Inertia::render('Invoices/ViewInvoices', [
            'params' => $request->input(),
            'invoices' => $this->listInvoices($request->input('sort')),
        ]);
    }

    /**
     * A page to create new invoice for customers
     * @return Inertia\Inertia
     */
    public function viewCreateInvoice() {
        Cache::add('countries', Countries::getCountries());
        return Inertia::render('Invoices/CreateInvoice', [
            'countries' => Cache::get('countries'),
            'tracking' => (int)substr(preg_replace("/[^0-9]/", "", Str::uuid()), 0, 10),
        ]);
    }

    /**
     * Create new invoice
     * @return redirect
     */
    public function createInvoice(Request $request) {
        $this->validateInvoiceCreate($request);
        if ($invoice = $this->onlyCreateInvoice($request)) {
            foreach ($request->inputs as $input) {
                $this->createInvoiceOrder($invoice, $input, $request);
            }
            foreach ($request->customers as $customer) {
                InvoiceCustomer::create([
                    'invoice_id' => $invoice->id,
                    'customer_id' => $customer
                ]);
            }
            return back()->with('message', ['successful_new_invoice' => 'New invoice has been created successfully.']);
        }
        return back()->with('message', ['new_invoice_failure' => 'Creating new invoice failed. Please try again later.']);
    }

    /**
     * A page to view and edit selected invoice
     * @return Inertia\Inertia
     */
    public function viewEditInvoice($invoice) {
        Cache::add('countries', Countries::getCountries());
        return Inertia::render('Invoices/ViewInvoiceEdit', [
            'invoice' => Invoice::where('id', $invoice)->with(['orders', 'customers'])->get(),
            'countries' => Cache::get('countries'),
        ]);
    }

    /**
     * Check and validate all inputs to create new invoice
     * @return response
     */
    private function validateInvoiceCreate($request) {
        return $request->validate([
            'customers' => ['required', 'array', 'min:1'],
            'sendMail' => ['required', 'boolean'],
            'invoiceDate' => ['required', 'date'],
            'dueDate' => ['required', 'date'],
            'shippingDate' => ['required', 'date'],
            'trackingNumber' => ['required', 'numeric'],
            'shippingCountry' => ['required', 'numeric'],
            'shippingState' => ['required', 'string'],
            'shippingHouseAddress' => ['required', 'string'],
            'shippingSuburb' => ['required', 'string'],
            'shippingPostcode' => ['required', 'string'],
            'inputs' => ['required', 'array', 'min:1'],
            'inputs.*.service' => ['required', 'numeric', 'min:1'],
            'inputs.*.quantity' => ['required', 'numeric', 'min:1'],
            'inputs.*.price' => ['required', 'numeric', 'min:1'],
            'inputs.*.gst' => ['required', 'boolean'],
        ]);
    }

    /**
     * Creates ONLY invoices. It inserts data into Invoices table
     * @return collection
     */
    private function onlyCreateInvoice ($request) {
        return Invoice::create([
            'country_id' => $request->shippingCountry,
            'tracking_number' => empty($request->trackingNumber) ? substr(preg_replace("/[^0-9]/", "", Str::orderedUuid()), 0, 16) : $request->trackingNumber,
            'invoice_date' => Carbon::parse($request->invoiceDate)->format('Y-m-d'),
            'due_date' => Carbon::parse($request->dueDate)->format('Y-m-d'),
            'shipping_date' => Carbon::parse($request->shippingDate)->format('Y-m-d'),
            'state' => $request->shippingState,
            'house_address' => $request->shippingHouseAddress,
            'city' => $request->shippingSuburb,
            'postcode' => $request->shippingPostcode
        ]);
    }

    /**
     * Creates Invoice Order data and pushes data into InvoiceOrders table
     * @return collection
     */
    private function createInvoiceOrder($invoice, $input, $request){
        InvoiceOrder::create([
            'invoice_id' => $invoice->id,
            'product_id' => $input['service'],
            'quantity' => $input['quantity'],
            'price' => $input['price'],
            'gst' => $input['gst'],
        ]);
    }

    /**
     * List available invoices and prepare them for sorting
     * @return Collection
     */
    private function listInvoices($sort) {
        $invoices = Invoice::with(['orders', 'customers'])->paginate(15);

        $this->sortInvoice($sort, $invoices);

        return $invoices;
    }

    /**
     * Get list of invoice and sort them
     * @return Collection
     */
    private function sortInvoice($sort, $invoice) {
        switch ($sort) {
            case 'oldest':
                $sortedResult = $invoice->getCollection()->sortByDesc('created_at')->values();
                $invoice->setCollection($sortedResult);
                break;
            case 'newest':
                $sortedResult = $invoice->getCollection()->sortBy('created_at')->values();
                $invoice->setCollection($sortedResult);
                break;
            default:
                $sortedResult = $invoice->getCollection()->sortBy('id')->values();
                $invoice->setCollection($sortedResult);
                break;
        }
        return false;
    }
}
