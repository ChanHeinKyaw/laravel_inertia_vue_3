<template>
    <div>
        <MasterVue>
            <div class="container mt-4">
                <div class="mb-2 d-flex">
                    <Link
                        href="/student/create"
                        class="btn btn-primary btn-sm mb-3"
                        >Create</Link
                    >
                    <div class="ml-auto">
                        <a
                            href="student_create.php"
                            class="btn btn-primary btn-sm mb-3 mr-2"
                            >Export</a
                        >
                        <a
                            href="student_create.php"
                            class="btn btn-primary btn-sm mb-3"
                            >Impport</a
                        >
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex">
                        <h3>Student Lists</h3>
                        <form class="form-inline ml-auto">
                            <input
                                class="form-control mr-sm-2"
                                type="search"
                                placeholder="Search"
                                aria-label="Search"
                            />
                            <button
                                class="btn btn-outline-primary my-2 my-sm-0"
                                type="submit"
                            >
                                Search
                            </button>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Major</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="student in students.data"
                                    :key="student.id"
                                >
                                    <th>{{ student.id }}</th>
                                    <td>{{ student.name }}</td>
                                    <td>{{ student.major.name }}</td>
                                    <td>{{ student.phone }}</td>
                                    <td>{{ student.email }}</td>
                                    <td>{{ student.address }}</td>
                                    <td>
                                        <Link
                                            :href="`/student/${student.id}/edit`"
                                            class="btn btn-success btn-sm mr-2"
                                            >Edit</Link
                                        >
                                        <button
                                            class="btn btn-danger btn-sm"
                                            @click="deleteStudent(student.id)"
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
    props: {
        students: Object,
    },
    components: { MasterVue, Link },
    methods: {
        deleteStudent($id) {
            this.$inertia.delete("/student/" + $id);
        },
    },
};
</script>
