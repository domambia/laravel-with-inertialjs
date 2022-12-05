import { default } from './Settings.vue';
<template>
    <div>
    <Head title="Users" />


    <div class="flex justify-between mt-6 mb-3">
       <div  class="flex items-center">
           <h2 class="text-2xl font-bold">User</h2>
           <Link href="/users/create"  class="text-blue-500 text-sm ml-2">New User</Link>
       </div>
        <input type="text" v-model="search" placeholder="Search ..." class="border rounded-lg p-2" />
    </div>

    <div class="table w-full">
        <div class="table-header-group">
            <div class="table-row bg-gray-300 px-3">
                <div class="table-cell text-left">#</div>
                <div class="table-cell text-left">Name</div>
                <div class="table-cell text-left">Email</div>
                <div class="table-cell text-left">TimeStamp</div>
            </div>
        </div>
        <div class="table-row-group">
            <div
                class="table-row"
                v-for="(user, index) of users.data"
                :key="index"
            >
                <div class="table-cell">{{ index + 1 }}</div>
                <div class="table-cell">{{ user.name }}</div>
                <div class="table-cell">{{ user.email }}</div>
                <div class="table-cell">
                    {{ new Date(Date(user.created_at)).toLocaleDateString() }}
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 max-width-2xl mx-auto" aria-label="Pagination">
        <ul class="inline-flex items-center -space-x-px">
            <li v-for="(page, index) of users.links" :key="index">
                <Link
                    :href="page.url"
                    class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    v-html="page.label"
                ></Link>
            </li>
        </ul>
    </div>
    </div>
</template>
<script setup>
import {ref, watch}  from  "vue";
import {Inertia}  from  "@inertiajs/inertia"
import debounce from  "lodash/debounce"
let props  = defineProps({
   users: Object,
    filters: Object
})

let search  =  ref(props.filters.search);

watch(search, debounce( function(value)
{
    Inertia.get('/users', {search: value}, {
        preserveState:  true,
        replace: true
    });
}, 500));
</script>
