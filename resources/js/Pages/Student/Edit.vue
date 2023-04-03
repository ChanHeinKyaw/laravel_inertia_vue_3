<template>
    <div>
        <MasterVue>
            <div class="container">
                <div class="card mt-5">
                    <h4 class="card-header font-weight-bold">Student Edit</h4>
                    <div class="card-body">
                        <form @submit.prevent="updateStudent(student.id)">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder="name"
                                    v-model="name"
                                />
                            </div>

                            <div class="form-group">
                                <label for="">Major</label>
                                <select class="form-control" v-model="major_id">
                                    <option value="">Choose Major</option>
                                    <template
                                        v-for="major in majors"
                                        :key="major.id"
                                    >
                                        <option :value="major.id">
                                            {{ major.name }}
                                        </option>
                                    </template>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Phone</label>
                                <input
                                    v-model="phone"
                                    type="number"
                                    class="form-control"
                                    id=""
                                    placeholder="09***********"
                                />
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input
                                    v-model="email"
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder="name@example.com"
                                />
                            </div>

                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea
                                    class="form-control"
                                    id=""
                                    v-model="address"
                                ></textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <Link
                                    href="/student"
                                    type="submit"
                                    class="btn btn-secondary"
                                    >Back</Link
                                >
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </form>
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
    props: { majors: Object, student: Object },
    data() {
        return {
            name: "",
            major_id: this.student.major_id,
            phone: "",
            email: "",
            address: "",
        };
    },
    methods: {
        updateStudent($id) {
            this.$inertia.put(
                "/student/" + $id,
                {
                    name: this.name,
                    major_id: this.major_id,
                    phone: this.phone,
                    email: this.email,
                    address: this.address,
                    __methods: "PUT",
                },
                {
                    onSuccess: () => {
                        this.name = "";
                        this.major_id = "";
                        this.phone = "";
                        this.email = "";
                        this.address = "";
                    },
                }
            );
        },
    },

    created() {
        this.name = this.student.name;
        this.phone = this.student.phone;
        this.email = this.student.email;
        this.address = this.student.address;
    },

    components: {
        MasterVue,
        Link,
    },
};
</script>
