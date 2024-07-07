"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[917,3],{5003:(e,t,r)=>{r.r(t),r.d(t,{default:()=>v});var o=r(6598),n=r(9049),a=r(9038),l=r(3907),c=r(2262),i=r(8706),s={class:"w-full h-fit bg-clouds-100 bg-opacity-5 relative flex justify-center py-24 px-6"},d=["onSubmit"],u=(0,o.createElementVNode)("div",{class:"w-full relative flex flex-col gap-0"},[(0,o.createElementVNode)("h1",{class:"w-full text-black text-2xl font-semibold tracking-wider uppercase text-center p-0"}," Sign In "),(0,o.createElementVNode)("p",{class:"w-full text-sm tracking-wide text-black text-opacity-70 text-center"}," Sign in to manage your sales ")],-1),m={class:"select-none relative w-full group"},p={class:"select-none relative w-full group"},b={key:0,class:"w-full flex flex-row gap-1 text-orange text-sm py-2"},f={class:"select-none flex justify-between items-center"},g={class:"flex items-center"},x=(0,o.createElementVNode)("label",{for:"checked-checkbox",class:"ml-2 text-sm font-medium text-smooth-black cursor-pointer"}," Remember me ",-1),h={class:"select-none w-full relative"},k=["disabled"],w={key:0,class:"w-full relative"};const v={__name:"Signin",props:{auth:Object,flash:Object},setup:function(e){var t=(0,l.oR)(),r=(0,c.qj)({caps:!1}),v=(0,a.cI)({email:null,password:null,remember:!0}),V=function(e){r.caps=e.getModifierState&&e.getModifierState("CapsLock")},y=function(){v.processing||v.post(route("signin"),{onSuccess:function(){t.dispatch("toggleSignedIn",!0),t.dispatch("toggleSignedOut",!1)}})};return function(t,a){var l=(0,o.resolveComponent)("Link");return(0,o.openBlock)(),(0,o.createBlock)(n.Z,{title:"Sign In",auth:e.auth},{default:(0,o.withCtx)((function(){return[(0,o.createElementVNode)("div",s,[(0,o.createElementVNode)("form",{action:"/",method:"POST",enctype:"multipart/form-data",class:"w-full bg-white border border-black border-opacity-10 p-6 rounded shadow-lg max-w-md flex flex-col gap-6",onSubmit:(0,o.withModifiers)(y,["prevent"])},[u,(0,o.createElementVNode)("div",m,[(0,o.withDirectives)((0,o.createElementVNode)("input",{type:"email",name:"email",id:"email",autocomplete:"true","onUpdate:modelValue":a[0]||(a[0]=function(e){return(0,o.unref)(v).email=e}),class:"block py-2.5 px-2 w-full text-sm text-black bg-white bg-opacity-20 rounded border border-thick-black appearance-none shadow-sm transition duration-300 ease-in-out m-0 ring-4 ring-transparent focus:ring-warm-blue focus:outline-none focus:border-thick-black",placeholder:"Email Address",required:""},null,512),[[o.vModelText,(0,o.unref)(v).email]])]),(0,o.createElementVNode)("div",p,[(0,o.withDirectives)((0,o.createElementVNode)("input",{type:"password",name:"password",id:"password",onKeydown:a[1]||(a[1]=function(e){return V(e)}),onClick:a[2]||(a[2]=function(e){return V(e)}),autocomplete:"false","onUpdate:modelValue":a[3]||(a[3]=function(e){return(0,o.unref)(v).password=e}),class:"block py-2.5 px-2 w-full text-sm text-smooth-black bg-white bg-opacity-20 rounded border border-thick-black appearance-none shadow-sm transition duration-300 ease-in-out m-0 ring-4 ring-transparent focus:ring-warm-blue focus:outline-none focus:border-thick-black",placeholder:"Password",required:""},null,544),[[o.vModelText,(0,o.unref)(v).password]]),(0,o.unref)(r).caps?((0,o.openBlock)(),(0,o.createElementBlock)("p",b,[(0,o.createVNode)((0,o.unref)(i),{class:"text-orange w-5 h-5"}),(0,o.createTextVNode)("Caps Lock is on! ")])):(0,o.createCommentVNode)("",!0)]),(0,o.createElementVNode)("div",f,[(0,o.createElementVNode)("div",g,[(0,o.withDirectives)((0,o.createElementVNode)("input",{id:"checked-checkbox",type:"checkbox",name:"remember_me","onUpdate:modelValue":a[4]||(a[4]=function(e){return(0,o.unref)(v).remember=e}),class:"form-check-input appearance-none bg-black bg-opacity-10 h-4 w-4 border border-black border-opacity-10 rounded-sm bg-white checked:bg-blue checked:border-blue ring-0 focus:ring-0 focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer"},null,512),[[o.vModelCheckbox,(0,o.unref)(v).remember]]),x]),(0,o.createVNode)(l,{href:t.route("forgotten.account"),class:"text-[13px] font-[600] capitalize text-blue tracking-wide"},{default:(0,o.withCtx)((function(){return[(0,o.createTextVNode)(" forgotten account ")]})),_:1},8,["href"])]),(0,o.createElementVNode)("div",h,[(0,o.createElementVNode)("button",{type:"submit",role:"button",disabled:(0,o.unref)(v).processing||!(0,o.unref)(v).isDirty,class:"text-base font-medium tracking-wide text-white bg-warm-blue p-2 rounded flex justify-center items-center cursor-pointer w-full capitalize transition duration-150 hover:bg-blue disabled:bg-warm-blue disabled:bg-opacity-75"}," sign in ",8,k)]),(0,o.unref)(v).hasErrors?((0,o.openBlock)(),(0,o.createElementBlock)("div",w,[(0,o.createElementVNode)("ul",null,[((0,o.openBlock)(!0),(0,o.createElementBlock)(o.Fragment,null,(0,o.renderList)((0,o.unref)(v).errors,(function(e,t){return(0,o.openBlock)(),(0,o.createElementBlock)("li",{key:t,class:"text-red text-sm tracking-wider font-normal"},(0,o.toDisplayString)(e),1)})),128))])])):(0,o.createCommentVNode)("",!0)],40,d)])]})),_:1},8,["auth"])}}}},6917:(e,t,r)=>{r.r(t),r.d(t,{default:()=>u});var o=r(6598),n=(r(9049),r(5003),{class:"p-0 m-0 relative"}),a={class:"relative m-0 p-0"},l=(0,o.createElementVNode)("div",{class:"h-[500px] relative overflow-hidden bg-no-repeat bg-homeHeroImage bg-cover bg-p-50"},null,-1),c={class:"absolute -translate-y-[40%] animate-fadeHomeHero left-0 right-0 mx-auto container mx-auto px-32 lg:px-12 xl:px-24"},i={class:"text-center text-black"},s={class:"block rounded-lg shadow-xl px-6 py-12 md:py-16 md:px-12 bg-white bg-opacity-70 backdrop-blur-xl"},d=(0,o.createElementVNode)("h1",{class:"text-2xl md:text-5xl xl:text-6xl font-bold tracking-tight mb-12"},[(0,o.createTextVNode)("The best offer on the market "),(0,o.createElementVNode)("br"),(0,o.createElementVNode)("span",{class:"text-warm-blue"},"for your business")],-1);const u={__name:"Home",props:{auth:Object,flash:Object},setup:function(e){return function(e,t){var r=(0,o.resolveComponent)("Link");return(0,o.openBlock)(),(0,o.createElementBlock)("div",n,[(0,o.createElementVNode)("section",a,[l,(0,o.createElementVNode)("div",c,[(0,o.createElementVNode)("div",i,[(0,o.createElementVNode)("div",s,[d,(0,o.createVNode)(r,{href:e.route("login"),class:"inline-block px-7 py-3 mb-2 md:mb-0 mr-0 md:mr-2 bg-warm-blue tracking-wide text-white font-medium text-base leading-snug uppercase rounded shadow-md hover:bg-blue hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out","data-mdb-ripple":"true","data-mdb-ripple-color":"light",role:"button"},{default:(0,o.withCtx)((function(){return[(0,o.createTextVNode)(" Sign In ")]})),_:1},8,["href"]),(0,o.createVNode)(r,{href:e.route("signup"),class:"inline-block px-7 py-3 text-white font-medium text-base tracking-wide leading-snug bg-transparent text-blue font-medium text-xs leading-tight uppercase rounded border border-black border-opacity-0 hover:border-opacity-5 hover:text-blue hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out","data-mdb-ripple":"true","data-mdb-ripple-color":"light",role:"button"},{default:(0,o.withCtx)((function(){return[(0,o.createTextVNode)(" Sign Up ")]})),_:1},8,["href"])])])])])])}}}}}]);