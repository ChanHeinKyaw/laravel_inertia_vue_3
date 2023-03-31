<template>
    <div>
        <MasterVue>
            <div class="container mt-4">
                <div class="mb-2">
                    <Link
                        href="/major/create"
                        class="btn btn-primary btn-sm mb-3"
                        >Create</Link
                    >
                </div>
                <div class="card">
                    <h3 class="card-header">Major Lists</h3>
                    <div class="card-body">
                        <table class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="major in majors.data"
                                    :key="major.id"
                                >
                                    <th>{{ major.id }}</th>
                                    <td>{{ major.name }}</td>
                                    <td>
                                        <Link
                                            :href="`/major/${major.id}/edit`"
                                            class="btn btn-success btn-sm mr-2"
                                            >Edit</Link
                                        >
                                        <button
                                            class="btn btn-danger btn-sm"
                                            @click="deleteMajor(major.id)"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </MasterVue>
    </div>
</template>

<script>
import MasterVue from "../Master.vue";
import { Link } from "@inertiajs/vue3";

export default {
    props: { majors: Object },
    components: {
        MasterVue,
        Link,
    },
    methods: {
        deleteMajor(id) {
            this.$inertia.delete("/major/" + id);
        },
    },
};
</script>
