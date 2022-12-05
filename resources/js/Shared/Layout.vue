<template>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="font-bold-400">My App</h1>
                <p class="text-sm ml-4">Welcome back! {{ username }}</p>
            </div>
            <NavComponent />
        </header>
    </section>
    <section class="p-6">
        <div class="max-width-3xl mx-auto">
            <slot />
        </div>
    </section>
</template>
<script>
import NavComponent from "./Nav.vue";
export default {
    components: { NavComponent },
    computed: {
        username() {
            return this.$page.props.auth.user.username;
        },
    },
};
</script>
<style lang=""></style>
