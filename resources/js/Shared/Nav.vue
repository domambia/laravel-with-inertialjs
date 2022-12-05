<template>
    <nav class="">
        <ul class="flex space-x-6">
            <li>
                <NavLink
                    class="text-blue-500 hover:underline"
                    href="/"
                    :active="$page.component === 'Home'"
                    >Home</NavLink
                >
            </li>
            <li>
                <NavLink
                    class="text-blue-500 hover:underline"
                    href="/users"
                    :active="$page.component === 'Users'"
                    >Users</NavLink
                >
            </li>
            <li>
                <NavLink
                    class="text-blue-500 hover:underline"
                    href="/settings"
                    :active="$page.component === 'Settings'"
                    >Settings</NavLink
                >
            </li>
            <li>
                <NavLink
                    class="text-blue-500 hover:underline"
                    href="/logout"
                    method="post"
                    as="button"
                    :active="$page.url === '/logout'"
                    >Log Out</NavLink
                >
            </li>
        </ul>
    </nav>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import NavLink from "./NavLink.vue";
export default {
    components: {
        Link,
        NavLink,
    },
};
</script>
<style lang=""></style>
