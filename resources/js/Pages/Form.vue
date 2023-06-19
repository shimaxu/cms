<script setup>
    import {Link} from "@inertiajs/inertia-vue3";
    import { PhotoIcon, UserCircleIcon } from '@heroicons/vue/24/solid'

    defineProps({
        article: Object
    })
</script>


<template>
    <div class="mx-auto max-w-7xl p-10 font-[poppins] space-y-6">
        <Link href="/" replace>
            <button class="py-2 px-4 bg-orange-600 text-sm font-semibold leading-6 text-white">Home</button>
        </Link>

        <form>
            <div class="space-y-12 sm:space-y-16">
                <div>
                    <div class="flex justify-between">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">New Post</h2>
                        <div>
                            <a href="#" class="relative z-10 bg-yellow-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-yellow-300">&#10000;</a>
                            <a href="#" class="relative z-10 bg-red-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-red-300">&#128465;</a>
                        </div>
                    </div>

                    <div class="space-y-8 pb-12 sm:space-y-0 sm:pb-0">

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Title</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input id="title" name="title" class="block w-full border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 sm:text-sm sm:leading-6" placeholder="Title"/>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                            <label for="slug" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Slug</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input id="slug" name="slug" class="block w-full border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 sm:text-sm sm:leading-6" placeholder="Slug"/>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                            <label for="content" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Content</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <textarea id="content" name="content" rows="10" class="block w-full border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 sm:text-sm sm:leading-6" placeholder="Start Writing.."></textarea>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                            <label for="excerpt" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Content</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <textarea id="excerpt" name="excerpt" rows="6" class="block w-full border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 sm:text-sm sm:leading-6" placeholder="Start Writing.."></textarea>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:py-4">
                            <label for="featured_image" class="block text-sm font-medium leading-6 text-gray-900">Featured Image</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input type="file" id="featured_image" name="featured_image" class="block w-full border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                            <label for="published_at" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Slug</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input type="date" id="published_at" name="published_at" class="block w-full border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 sm:text-sm sm:leading-6" placeholder="Slug"/>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                            <label for="published_at" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5"></label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0 space-x-4">
                                <button type="submit" class="inline-flex justify-center py-2 px-6 bg-orange-600 text-sm font-semibold leading-6 text-white">Save</button>
                                <button type="button" class="inline-flex justify-center py-2 px-6 bg-gray-300 text-sm font-semibold leading-6 text-gray-600">Cancel</button>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </form>
    </div>


</template>
