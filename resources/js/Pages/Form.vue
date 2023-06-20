<script setup>
    import { useForm, Link } from '@inertiajs/vue3'
    import moment from 'moment'

    defineProps({
        article: Object,
    })

    const form = useForm({
        title: null,
        slug: null,
        content: null,
        excerpt: null,
        published_at: null,
        featured_image: null,
    })

    function store() {
        form.post('/store')
    }

    function update(slug) {
        form.post(`/${slug}`)
    }

</script>


<template>
    <div class="mx-auto max-w-7xl p-10 font-[poppins] space-y-6">
        <Link href="/" replace>
            <button class="py-2 px-4 bg-orange-600 text-sm font-semibold leading-6 text-white">Home</button>
        </Link>

        <form @submit.prevent="article?.id?update(article?.slug):store()">
            <div class="space-y-12 sm:space-y-16 bg-white p-4">
                <div>
                    <div class="flex justify-between">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">New Post</h2>
                    </div>

                    <div class="space-y-8 pb-12 sm:space-y-0 sm:pb-0">

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Title</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input :value="article?.title" @input="form.title = $event.target.value" id="title" name="title" class="block w-full border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 sm:text-sm sm:leading-6" placeholder="Title"/>
                                <div class="text-red-400 py-2" v-if="form.errors.title">{{ form.errors.title }}</div>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                            <label for="slug" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Slug</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input :value="article?.slug" @input="form.slug = $event.target.value" id="slug" name="slug" class="block w-full border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 sm:text-sm sm:leading-6" placeholder="Slug"/>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                            <label for="content" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Content</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <textarea @input="form.content = $event.target.value" id="content" name="content" rows="10" class="block w-full border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 sm:text-sm sm:leading-6" placeholder="Start Writing..">{{article?.content}}</textarea>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                            <label for="excerpt" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Excerpt</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <textarea @input="form.excerpt = $event.target.value" id="excerpt" name="excerpt" rows="6" class="block w-full border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 sm:text-sm sm:leading-6" placeholder="Start Writing..">{{article?.excerpt}}</textarea>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:py-4">
                            <label for="featured_image" class="block text-sm font-medium leading-6 text-gray-900">Featured Image</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input @input="form.featured_image = $event.target.files[0]" type="file" id="featured_image" name="featured_image" class="block w-full border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 sm:text-sm sm:leading-6"/>
                                <div class="text-red-400 py-2" v-if="form.errors.featured_image">{{ form.errors.featured_image }}</div>
                                <div v-if="article?.featured_image">
                                    <img v-if="article.featured_image" :src="article.featured_image" alt="" class="h-aspect-[16/9] w-full bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[4/2]">
                                </div>
                                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                    {{ form.progress.percentage }}%
                                </progress>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                            <label for="published_at" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Published Date</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input :value="moment(article?.published_at).format('yyyy-MM-D')" @input="form.published_at = $event.target.value" type="date" id="published_at" name="published_at" class="block w-full border-0 p-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 sm:text-sm sm:leading-6" placeholder="Published Date"/>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                            <label class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5"></label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0 space-x-4">
                                <button :disabled="form.processing" type="submit" class="inline-flex justify-center py-2 px-6 bg-orange-600 text-sm font-semibold leading-6 text-white">Save</button>
                                <button type="button" class="inline-flex justify-center py-2 px-6 bg-gray-300 text-sm font-semibold leading-6 text-gray-500">Cancel</button>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </form>
    </div>


</template>
