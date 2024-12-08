<script setup lang="ts">
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";
import Swal from "sweetalert2";

interface UserForm {
    name: string;
    email: string;
    phone: string;
    password: string;
}

const userForm = ref<UserForm>({
    name: "",
    email: "",
    phone: "",
    password: "",
});

const apiUrl = import.meta.env.VITE_API_URL;

const handleSubmit = async (event: Event) => {
    event.preventDefault();

    try {
        const response = await axios.post(
            `${apiUrl}/api/user/add`,
            userForm.value
        );

        Swal.fire("Created Successfully").then((result) => {
            if (result.isConfirmed) {
                router.push("/");
            }
        });
    } catch (error) {
        console.error("Error submitting data:", error);
    }
};

const router = useRouter();

const handleBack = () => {
    router.push("/");
};
</script>

<template>
    <div class="container max-w-3xl mx-auto">
        <div class="text-xl font-bold pb-4">Create</div>
        <form @submit="handleSubmit" class="flex flex-col gap-2">
            <label class="input input-bordered flex items-center gap-2">
                Name
                <input type="text" class="grow" v-model="userForm.name" />
            </label>
            <label class="input input-bordered flex items-center gap-2">
                Email
                <input type="email" class="grow" v-model="userForm.email" />
            </label>
            <label class="input input-bordered flex items-center gap-2">
                Phone
                <input type="text" class="grow" v-model="userForm.phone" />
            </label>
            <label class="input input-bordered flex items-center gap-2">
                Password
                <input
                    type="password"
                    class="grow"
                    v-model="userForm.password"
                />
            </label>
            <div class="flex gap-2 pt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button
                    type="button"
                    class="btn btn-primary"
                    @click="handleBack"
                >
                    Back
                </button>
            </div>
        </form>
    </div>
</template>
