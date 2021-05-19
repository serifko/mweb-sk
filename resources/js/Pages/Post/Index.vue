<template>
  <app-layout>
      <div class="container">
        <h1 class="h1">Články</h1>
        <div v-if="posts && posts.data.length>0">
          <article v-for="post in posts.data" :key="post.id" class="flow-root">
            <header>
                <h2 class="h2">{{ post.title }}</h2>
            </header>
            <div>
              <img :src="getImage(post)" class="w-1/2 mr-5 mb-5 rounded-md float-left border-2 border-gray-400 " >
              <p v-html="post.body"></p>
            </div>
            <footer class="mt-5">
              <p class="italic">Napísal {{ post.user.name }} dňa {{ moment(post.created_at).fromNow() }}.</p>
            </footer>
          </article>
            <pagination class="mt-6" :links="posts.links" />
        </div>

      </div>
  </app-layout>
  <teleport to="title">
      {{ ' | články' }}
  </teleport>
</template>
  
<script>
import Pagination from '@/Components/Pagination'
import AppLayout from '@/Layouts/AppLayout'
import moment from 'moment'
export default {
    props: {
      posts: Object,
    },
    data() {
      return {
        moment: moment,
      }
    },
    components: {
        AppLayout,
       Pagination
      },
      mounted(){
      },
      methods: {
        getImage(post_l){
          return post_l.image == null ? '/storage/images/no_img.jpg' : '/storage/'+post_l.image
        }
      }
}
</script>