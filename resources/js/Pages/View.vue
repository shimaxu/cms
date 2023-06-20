<script setup>
import {Link, router} from "@inertiajs/vue3";
import { PencilIcon, TrashIcon } from '@heroicons/vue/24/outline'
import { reactive } from 'vue'

const state = reactive({
    modalState: true
})

defineProps({
    article: Object
})

function edit(slug) {
    router.get(`${slug}/edit`)
}

function destroy(slug) {
    state.modalState = true;
    if(confirm('Are you sure you want delete the article')) {
        router.delete(`${slug}`)
    }
}
</script>

<template>
    <div class="mx-auto max-w-7xl p-10 font-[poppins]">
        <Link href="/" replace>
            <button class="py-2 px-4 bg-orange-600 text-sm font-semibold leading-6 text-white">Home</button>
        </Link>

        <article class="flex flex-col items-start space-y-4">
            <div class="flex justify-between w-full">
                <div>
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-slate-700 group-hover:text-gray-600">
                        {{ article.title }}
                    </h3>
                </div>

                <div class="space-x-2">
                    <button @click="edit(article.slug)">
                        <PencilIcon class="h-4 w-4" aria-hidden="true"/>
                    </button>

                    <button @click="destroy(article.slug)">
                        <TrashIcon class="h-4 w-4" aria-hidden="true"/>
                    </button>
                </div>

            </div>

            <div class="flex items-center gap-x-4 text-xs">
                <time datetime="2020-03-16" class="relative font-medium text-gray-600 hover:bg-gray-100">{{ article.published_at }}</time>
            </div>
            <div class="relative w-full">
                <img v-if="article.featured_image" :src="article.featured_image" alt="" class="h-aspect-[16/9] w-full bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[4/2]">
                <img v-else src="/images/placeholder.png" alt="" class="h-aspect-[16/9] w-full bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[4/2]">

                <div class="max-w-xl justify-center mx-auto">
                    <div>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ article.content}}</p>
                    </div>
                </div>
            </div>

        </article>

        <DeleteModal :modal-open="state.modalState"/>
    </div>

</template>
