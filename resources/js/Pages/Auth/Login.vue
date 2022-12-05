<template>
    <Head title="Login" />
    <main class="grid place-items-center min-h-screen ">
    <section  class="bg-white p-8 rounded-xl max-w-md mx-auto border">
            <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
                <h2 class="text-3xl font-bold mb-6 text-center">Login</h2>
                <div class="mb-6">
                    <label
                        class="block mb-2 font-bold text-xs text-gray-700"
                        for="email"
                    >
                        Email
                    </label>
                    <input  v-model="form.email"  class="border p-2 w-full rounded" type="email" />
                    <div v-if="form.errors.email" v-text="form.errors.email"  class="text-red-500 text-xs mt-1"></div>
                </div>

                <div class="mb-6">
                    <label
                        class="block mb-2 font-bold text-xs text-gray-700"
                        for="password"
                    >
                        Password
                    </label>
                    <input  v-model="form.password"  class="border rounded p-2 w-full" type="password" />
                    <div v-if="form.errors.password" v-text="form.errors.password"  class="text-red-500 text-xs mt-1"></div>
                </div>
                <div class="mb-6">
                    <button
                        class="bg-blue-400 text-white-rounded py-2 px-4 hover:bg-blue-500 text-white"
                        :class="{'disabled' :  form.processing}"
                        :disabled="form.processing"  type="submit">
                        Login
                    </button>
                </div>

                <div class="mt-3 text-center text-sm">
                    Already have an account?  <Link class="text-blue-500" href="/auth/register"> Create Account </Link>
                </div>
            </form>

    </section>
    </main>


</template>

<script>
export default  {
    layout: null
}
</script>
<script setup>

import {useForm} from "@inertiajs/inertia-vue3";

let form  =  useForm({
    email: "",
    password: "",
})


let submit  =  () => {
    form.post("/auth/login", form);
}

</script>
