<script setup lang="ts">
import { ref } from "vue";
import TableComponent from "@/components/index/table.vue";
import SearchComponent from "@/components/index/searchbar.vue";
import { useRouter } from "vue-router";

const apiUrl = import.meta.env.VITE_API_URL;

console.log("apiUrl", apiUrl);

const newKeywords = ref("");
const router = useRouter();

const searchKeywords = (keywords: string) => {
    newKeywords.value = keywords;
};

const handleCreate = () => {
    router.push("/create");
};
</script>

<template>
    <div class="navbar bg-base-100">
        <button type="button" class="btn btn-primary" @click="handleCreate">
            Create
        </button>
    </div>
    <div class="overflow-x-auto">
        <SearchComponent @search="searchKeywords" />
        <TableComponent :keywords="newKeywords" />
    </div>
</template>
