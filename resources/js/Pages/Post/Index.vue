<template>
  <app-layout>
      <div class="container">
        <h1 class="h1">Články{{ searchCategory ? ': '+searchCategory.name : '' }}</h1>
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
              <p class="italic text-right">Napísal {{ post.user.name }} {{ moment(post.created_at).fromNow() }}.</p>
              <p>{{ post.category.treeCategory.length == 1 ? 'Kategória' : 'Kategórie' }}: 
                <span v-for="(category, index) in post.category.treeCategory" :key="category.id">
                    <a :href="route('posts', {category_slug: category.slug})" class="hover:underline">{{ category.name }}</a>
                    <span v-if="index+1 != post.category.treeCategory.length" class="mx-1">-></span>
                </span>
                </p>
            </footer>
          </article>
            <pagination class="mt-6" :links="posts.links" />
        </div>

      </div>
  </app-layout>
  <teleport to="title">
      <template v-if="!!searchCategory">{{ ' | články: '+searchCategory.name }}</template>
      <template v-else>{{ ' | články'}}</template>
  </teleport>
</template>
  
<script>
import Pagination from '@/Components/Pagination'
import AppLayout from '@/Layouts/AppLayout'
import moment from 'moment'
export default {
    props: {
      posts: Object,
      searchCategory: Object,    },
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
         this.moment.lang('sk');
      },
      methods: {
        getImage(post_l){
          return post_l.image == null ? '/storage/images/no_img.jpg' : '/storage/'+post_l.image
        }
      }
}
</script>