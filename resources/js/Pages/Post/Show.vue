<template>
    <app-layout>
        <article>
            <header>
                <h1 class="h1">{{ post.title }}</h1>
                        <img v-if="post.image!=null" :src="'/storage/'+post.image" :alt="post.title" class="w-1/3 border-gray-400 rounded-2xl float-left mr-3 mb-3">
                        <div class="float-right w-1/5 ml-3 mb-3">
                            <!-- FB SHARE -->
                        </div>
            </header>
            <main v-html="post.body"></main>
            <footer>
                <p class="italic text-right text-gray-900 text-md">Uverejnil {{ post.user.name }} dňa {{ moment(post.created_at).fromNow() }}.</p>
            </footer>
        </article>

    </app-layout>
</template>


<script>
import AppLayout from '@/Layouts/AppLayout'
import moment from 'moment'
export default {
    props: ['post'],
    data(){
        return {
            moment: moment
        }
    },
    components: {
        AppLayout
    },
    mounted(){
    }
}
</script>