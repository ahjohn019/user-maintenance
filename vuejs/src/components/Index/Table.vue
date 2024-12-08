<script setup lang="ts">
import { ref, onMounted, computed } from "vue";
import axios from "axios";

interface User {
    id: number;
    name: string;
    email: string;
    phone: string;
}

const data = ref<User[]>([]);
const props = defineProps<{
    keywords: string;
}>();

const apiUrl = import.meta.env.VITE_API_URL;

onMounted(async () => {
    try {
        const response = await axios.get(`${apiUrl}/api/user/all`);
        data.value = response.data.Data;
    } catch (error) {
        console.error("Error fetching data:", error);
    }
});

const filteredData = computed(() => {
    if (!props.keywords) {
        return data.value;
    }
    const lowercasedKeyword = props.keywords.toLowerCase();
    return data.value.filter((user) =>
        user.name.toLowerCase().includes(lowercasedKeyword)
    );
});
</script>

<template>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in filteredData" :key="item.id">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.email }}</td>
                    <td>{{ item.phone }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
