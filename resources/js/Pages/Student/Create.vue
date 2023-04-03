<template>
    <div>
        <MasterVue>
            <div class="container">
                <div class="card mt-5">
                    <h4 class="card-header font-weight-bold">Student Create</h4>
                    <div class="card-body">
                        <form @submit.prevent="createStudent()">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    placeholder="name"
                                    v-model="name"
                                    :class="{ 'is-invalid': errors.name }"
                                />
                                <span
                                    class="invalid-feedback"
                                    v-show="errors.name"
                                    >{{ errors.name }}</span
                                >
                            </div>

                            <div class="form-group">
                                <label for="">Major</label>
                                <select
                                    v-model="major_id"
                                    class="form-control"
                                    :class="{ 'is-invalid': errors.major_id }"
                                >
                                    <option value="">Choose Major</option>
                                    <option
                                        :value="major.id"
                                        v-for="major in majors"
                                        :key="major.id"
                                    >
                                        {{ major.name }}
                                    </option>
                                </select>
                                <span
                                    class="invalid-feedback"
                                    v-show="errors.major_id"
                                    >{{ errors.major_id }}</span
                                >
                            </div>

                            <div class="form-group">
                                <label for="">Phone</label>
                                <input
                                    v-model="phone"
                                    type="number"
                                    class="form-control"
                                    :class="{ 'is-invalid': errors.phone }"
                                    id=""
                                    placeholder="09***********"
                                />
                                <span
                                    class="invalid-feedback"
                                    v-show="errors.phone"
                                    >{{ errors.phone }}</span
                                >
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input
                                    v-model="email"
                                    type="text"
                                    class="form-control"
                                    :class="{ 'is-invalid': errors.email }"
                                    id=""
                                    placeholder="name@example.com"
                                />
                                <span
                                    class="invalid-feedback"
                                    v-show="errors.email"
                                    >{{ errors.email }}</span
                                >
                            </div>

                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea
                                    v-model="address"
                                    class="form-control"
                                    :class="{ 'is-invalid': errors.address }"
                                    id=""
                                ></textarea>
                                <span
                                    class="invalid-feedback"
                                    v-show="errors.address"
                                    >{{ errors.address }}</span
                                >
                            </div>

                            <div class="d-flex justify-content-between">
                                <Link
                                    href="/student"
                                    type="submit"
                                    class="btn btn-secondary"
                                    >Back</Link
                                >
                                <button type="submit" class="btn btn-primary">
                                    Create
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
    data() {
        return {
            name: "",
            major_id: "",
            phone: "",
            email: "",
            address: "",
        };
    },
    props: { majors: Object, errors: Object },
    components: {
        MasterVue,
        Link,
    },
    methods: {
        createStudent() {
            this.$inertia.post(
                "/student",
                {
                    name: this.name,
                    major_id: this.major_id,
                    phone: this.phone,
                    email: this.email,
                    address: this.address,
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
};
</script>
