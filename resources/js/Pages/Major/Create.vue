<template>
    <div>
        <MasterVue>
            <div class="container">
                <div class="card mt-5">
                    <h4 class="card-header font-weight-bold">Major Create</h4>
                    <div class="card-body">
                        <form @submit.prevent="createMajor()">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="name"
                                    placeholder="name"
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
        };
    },
    components: {
        MasterVue,
        Link,
    },
    methods: {
        createMajor() {
            this.$inertia.post(
                "/major",
                { name: this.name },
                {
                    onSuccess: () => {
                        this.name = "";
                    },
                }
            );
        },
    },
};
</script>
