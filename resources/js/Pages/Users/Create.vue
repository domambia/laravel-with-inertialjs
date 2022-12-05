<template>
    <Head title="Create Account" />
    <h2 class="text-3xl font-bold">Create New User</h2>

    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label class="block mb-2 font-bold text-xs text-gray-700">
                Name
            </label>
            <input v-model="form.name" class="border border-gray-400 p-2 w-full" type="text" />
            <div v-if="form.errors.name" v-text="form.errors.name"  class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 font-bold text-xs text-gray-700"
                for="email"
            >
                Email
            </label>
            <input  v-model="form.email"  class="border border-gray-400 p-2 w-full" type="email" />
            <div v-if="form.errors.email" v-text="form.errors.email"  class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 font-bold text-xs text-gray-700"
                for="password"
            >
                Password
            </label>
            <input  v-model="form.password"  class="border border-gray-400 p-2 w-full" type="password" />
            <div v-if="form.errors.password" v-text="form.errors.password"  class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <button
                class="bg-blue-400 text-white-rounded py-2 px-4 hover:bg-blue-500 text-white"
                :class="{'disabled' :  form.processing}"
                    :disabled="form.processing"  type="submit">
                Submit
            </button>
        </div>
    </form>
</template>
<script setup>
//import {reactive}  from  "vue"
//import {Inertia}  from  "@inertiajs/inertia"
import {useForm}  from  "@inertiajs/inertia-vue3"
let form  =   useForm({
    name: "",
    email: "",
    password: ""
});

/**let form  =   reactive({
    name: "",
    email: "",
    password: ""
});*/
// let processing  =  ref(false);

defineProps({
   errors: Object
});
let submit  = () => {

    form.post("/users");
    /**Inertia.post("/users",  form,  {
        onStart: ()=> {},
        onFinish:()=> {}
    });
     */
}


</script>
