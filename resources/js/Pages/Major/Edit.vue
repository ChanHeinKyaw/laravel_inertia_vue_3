<template>
    <div>
        <MasterVue>
            <div class="container">
                <div class="card mt-5">
                    <h4 class="card-header font-weight-bold">Major Edit</h4>
                    <div class="card-body">
                        <form @submit.prevent="updateMajor()">
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

                            <div class="d-flex justify-content-between">
                                <Link
                                    href="/major"
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
    props: { major: Object },
    data() {
        return {
            name: "",
        };
    },
    components: {
        MasterVue,
        Link,
    },
    methods: {
        updateMajor() {
            this.$inertia.put(
                "/major/" + this.major.id,
                { name: this.name, __methods: "PUT" },
                {
                    onSuccess: () => {
                        this.name = "";
                    },
                }
            );
        },
    },
    created() {
        this.name = this.major.name;
    },
};
</script>
