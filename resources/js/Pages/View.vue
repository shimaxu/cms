<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    article: Object
})
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

                <div>
                    <a :href="`/${article.slug}/edit`" class="relative z-10 bg-yellow-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-yellow-300">&#10000;</a>
                    <a href="#" class="relative z-10 bg-red-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-red-300">&#128465;</a>
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
    </div>

</template>
