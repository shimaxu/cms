<script setup>
    import {Link} from "@inertiajs/inertia-vue3";

    defineProps({
        articles: Object
    })
</script>

<template>
    <div class="mx-auto max-w-7xl p-10 font-[poppins] space-y-6">
        <Link href="/create" replace>
            <button class="py-2 px-4 bg-orange-600 text-sm font-semibold leading-6 text-white">+ Add New</button>
        </Link>

        <article class="relative isolate flex flex-col gap-8 lg:flex-row bg-white">
            <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
                <img src="/images/1.jpg" alt="" class="absolute inset-0 h-full w-full bg-gray-50 object-cover">
                <div class="absolute inset-0 ring-1 ring-inset ring-gray-900/10"></div>
            </div>
            <div class="">

                <div class="group relative">
                    <div class="flex items-center gap-x-4 text-xs p-2 w-full justify-between">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 text-gray-600">
                            Demon Slayer
                        </h3>
                        <div>
                            <a href="#" class="relative z-10 bg-yellow-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-yellow-300">&#10000;</a>
                            <a href="#" class="relative z-10 bg-red-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-red-300">&#128465;</a>
                        </div>
                    </div>


                    <p class="mt-5 text-sm leading-6 text-gray-600">Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel iusto corrupti dicta laboris incididunt.</p>
                </div>
                <div class="mt-6 flex border-gray-900/5">
                    <Link href="/view/slug" replace>
                        <button class="py-2 px-4 bg-orange-600 text-sm font-semibold leading-6 text-white">Read More →</button>
                    </Link>
                </div>
            </div>
        </article>
    </div>


</template>
