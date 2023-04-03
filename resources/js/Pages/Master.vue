<template>
    <div>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta
                    name="viewport"
                    content="width=device-width, initial-scale=1.0"
                />
                <title>Document</title>
                <link
                    rel="stylesheet"
                    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
                    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
                    crossorigin="anonymous"
                />
            </head>
            <body>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container">
                        <Link class="navbar-brand" href="/student">Home</Link>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div
                            class="collapse navbar-collapse"
                            id="navbarSupportedContent"
                        >
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <Link class="nav-link" href="/student"
                                        >Students</Link
                                    >
                                </li>
                                <li class="nav-item">
                                    <Link class="nav-link" href="/major"
                                        >Majors</Link
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <slot />
            </body>
        </html>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
export default {
    name: "MasterVue",
    components: { Link },
};
</script>
