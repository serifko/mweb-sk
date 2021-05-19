<template>
    <app-layout>
        <div class="flow-root">
            <h1 class="h1">{{ page.title }}</h1>
            <img v-if="page.image != null" :src="'/storage/'+page.image" class="w-1/3 rounded-xl border-2 border-gray-400 float-left mr-4 mb-4">
            <div v-html="page.body"></div>
        </div>
        <div class="flow-root text-right italic">
            <p>Naposedy upravené {{ moment(page.updated_at).format('D.M.Y o HH:mm') }} hod.</p>
        </div>
    </app-layout>
    <teleport to="title">
        {{ ' | ' + page.title }}
    </teleport>

</template>


<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import moment from 'moment'
export default {
  components: { AppLayout },
    props: ['page'],
    data(){
        return{
            moment: moment
        }
    },
    mounted(){
        console.log(this.page)
    }
}
</script>