<template>
    <Layout :title="'Change Password'" :auth="auth">
        <div class="w-full relative flex justify-center items-center py-14 px-6">
            <form action="/" method="POST" enctype="multipart/form-data" 
            class="w-full max-w-md flex flex-col gap-6"
            @submit.prevent="changeDefaultPassword">
                <h1 class="w-full text-base text-center font-semibold tracking-wider text-black flex flex-col">
                    Change Your Default Password
                    <span class="text-sm text-black text-opacity-60">
                        Please change your default password to make your account secure.
                    </span>
                </h1>
                <!-- password input box -->
                <div class="select-none relative w-full group">
                    <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    autocomplete="false"
                    autofocus="false"
                    v-model="defaultPasswordForm.password"
                    class="block py-2.5 px-2 w-full text-sm text-smooth-black bg-transparent rounded border border-thick-black appearance-none focus:outline-none focus:ring-0 focus:border-thick-black peer" placeholder=" " required />
                    <label for="password" class="w-full px-2 capitalize peer-focus:font-medium absolute text-sm text-smooth-black duration-200 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">
                        password
                    </label>
                </div>

                <!-- sign in button -->
                <div class="select-none w-full relative">
                    <button type="submit" role="button"
                    class="text-base font-medium tracking-wide text-white bg-warm-blue p-2 rounded flex justify-center items-center cursor-pointer w-full capitalize transition duration-150 hover:bg-blue" >
                        Set Password
                    </button>
                </div>

                <!-- Form submission output reports -->
                <div v-if="defaultPasswordForm.hasErrors" class="w-full relative">
                    <ul>
                        <li v-for="(message, i) in defaultPasswordForm.errors" :key="i"
                        class="text-red text-sm tracking-wider font-normal">
                            {{message}}
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </Layout>
</template>
<script setup>
    import Layout from '../../Layouts/Dashboard.vue'
    import { useForm } from '@inertiajs/inertia-vue3';
    import {useStore} from 'vuex'

    const props = defineProps({
        auth: Object,
        flash: Object
    });

    const store = useStore()

    const defaultPasswordForm = useForm({
        password: null,
    })

    const changeDefaultPassword = () => {
        if (!defaultPasswordForm.processing) {
            defaultPasswordForm.patch(route('change.password'))
        }
    }
</script>