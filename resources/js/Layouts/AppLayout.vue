<template>
  <div>
    <div class="min-h-screen max-w-7xl mx-auto">
      <header class="flex align-middle bg-gray-300">

        <img src="" class="h-24 float-left pl-8 pr-12" />
        <div class="py-4">
          <span class="mb-auto mt-auto text-4xl text-gray-800 font-serif font-semibold italic">mWeb.sk</span>
          <br>
          <span class="mb-auto mt-auto text-2xl text-gray-600  font-serif font-semibold italic pl-3">kdo to nevie, ten to o tom píše...</span>
        </div>
      </header>
      <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-gray-700">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
          <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
            <inertia-link class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="/">
              <i class="fas fa-home text-xl hover:text-gray-300"></i>
            </inertia-link>
            <button class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button">
              <span class="block relative w-6 h-px rounded-sm bg-white"></span>
              <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
              <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
            </button>
          </div>
          <div class="lg:flex flex-grow items-center" id="example-navbar-warning">
            <ul class="flex flex-col lg:flex-row list-none mr-auto">
              <!--
              <li class="nav-item">
                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#pablo">
                  <i class="fab fa-facebook-square text-lg leading-lg text-white opacity-75" /> 
                </a>
              </li>
              <li class="nav-item">
                <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="#pablo">
                  <i class="fab fa-twitter text-lg leading-lg text-white opacity-75" /> <span class="ml-2">Tweet</span>
                </a>
              </li>
              -->
              <li class="nav-item">
                <inertia-link class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="/clanky">
                  <span class="ml-2">Články</span>
                </inertia-link>
              </li>
            </ul>
            <!--
            <div class="relative flex w-full sm:w-7/12 md:w-5/12 px-4 flex-wrap items-stretch lg:ml-auto">
              <div class="flex">
                <span class="font-normal leading-snug flex text-center white-space-no-wrap border border-solid border-blueGray-600 rounded-full text-sm bg-white items-center rounded-r-none pl-2 py-1 text-blueGray-800 border-r-0 placeholder-blueGray-300">
                  <i class="fas fa-search"></i>
                </span>
              </div>
              <input type="text" class="px-2 py-1 h-8 border border-solid  border-blueGray-600 rounded-full text-sm leading-snug text-blueGray-700 bg-white shadow-none outline-none focus:outline-none w-full font-normal rounded-l-none flex-1 border-l-0 placeholder-blueGray-300" placeholder="Search blueGray" />
            </div>-->
          </div>
        </div>
      </nav>
      <section class="flex flex-col md:flex-row h-screen bg-white" >
        <aside class="w-1/5 w-max-64 pl-2 pt-2 pr-2 m-0 bg-gray-700 border-t-2 border-gray-500 text-white">
        <fieldset class="border-2 p-2">
            <legend class="text-gray-300 text-2xl font-semibold p-0">Novinky: </legend>
            <div v-for="freshNew in freshNews" :key="freshNew.id" class="mb-3 border-b-2 ">
              <span v-if="freshNew.title != null" class="block font-bold">{{ freshNew.title }}</span>
              <span class="italic">{{  moment(freshNew.created_at).format('D.M.Y o HH:mm') }}: </span><span>{{freshNew.text}}</span>
            </div>
        </fieldset>
        </aside>
        <main class="w-4/5 pt-5 pl-5 pr-5 pb-40 bg-gray-100">
          <slot></slot>
        </main>
      </section>
      <footer class="w-full text-center  text-md my-4 pb-10">
        ©<a href="https://github.com/serifko" target="_blank" class="ml-1 text-gray-700 hover:underline ">serifko</a>, 2021
      </footer>
    </div>
</div>
</template>

<script>
import moment from 'moment';

export default {
  data(){
    return {
      freshNews: null,
      moment: moment
    }
  },
  mounted(){
    axios.get(route('getFreshNews'))
                  .then((res) => {
                    this.freshNews = res.data.fresh_news
                  })
  },
  computed: {
    setFreshNews(){
      return this.freshNews
    }
  }
}
</script>