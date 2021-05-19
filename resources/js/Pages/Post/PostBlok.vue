<template>
    <h1>{{ post }}</h1>   
</template>

<script>
export default {
    params: ['post'],
    mounted(){
        console.log(this.post)
    }
}
</script>