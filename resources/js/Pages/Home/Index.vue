
<template>
    <app-layout>
        <h1 class="h1">Homepage</h1>
        <div class="w-full px-5 py-4 border-2 rounded-2xl" v-if="home_welcome!=null">
            <section v-html="home_welcome"></section>
            <hr class="my-4">
        </div>
        <div class="mt-5">
            <h2 class="h2">Posledné články</h2>
            <div class="flex flex-row">
                <div v-for="post in posts" :key="post.id" class="w-1/3 mr-3 rounded-xl border-2 p-3">
                    <h3 class="h3 text-xl">{{ post.title }}</h3>
                    <p>
                        <img :src="getImage(post)" class="w-2/5 mr-2 mb-2 float-left">
                        {{ cutBody(post.body) }}
                    </p>
                    <p v-if="hasLongBody(post.body)" class="text-right text-base">
                        <inertia-link :href="route('post.show', {post: post.slug })" class="link">zobraziť celý článok...</inertia-link>
                    </p>
                </div>
            </div>
        </div>
    </app-layout>
</template>


 <script>
import  AppLayout from '@/Layouts/AppLayout'

 export default {
  props: ['posts', 'home_welcome'],
  data() {
      return {
          max_post_text_char: 350
      }
  },
  components: {
      AppLayout
  },
  methods: {
      hasLongBody(body){
        var clear_body = body.replace(/<[^>]*>?/gm, '')
        if(clear_body.length > this.max_post_text_char){
            return true;
        }
        return false
      },
      cutBody(body){
        var clear_body = body.replace(/<[^>]*>?/gm, '')
        if(this.hasLongBody(body)){
            return clear_body.slice(0, this.max_post_text_char) + '...';
        }
        return clear_body
      },
      getImage(post_l){
          return post_l.image == null ? '/storage/images/no_img.jpg' : '/storage/'+post_l.image
      }

  }
 }
 </script>