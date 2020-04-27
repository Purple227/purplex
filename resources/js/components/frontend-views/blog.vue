<template>

  <div class="container container_mobile"> <!-- Container tag start -->

    <div class="buttons is-centered" v-if="pagination.total > 5">
      <span class="button is-success border_curve" @click="postsData(pagination.previousPageUrl)"> Previous </span>
      <span class="button is-info border_curve"> {{ pagination.to }} of {{pagination.total}} </span>
      <span class="button is-danger border_curve" @click="postsData(pagination.nextPageUrl)"> Next </span>
    </div>
    
    <div class="tile is-ancestor"> <!-- Ancestors tag open-->

      <div class="tile is-vertical is-8">
        <div class="tile">
          <div class="tile is-parent is-vertical">

           
            
             <router-link :to="{name: 'post', params: {slug: blogList[0].slug}}" v-if="blogList[0]"  class="tile is-child notification is-primary blog border_curve">
              <article >
              <p class="title fa"> {{ blogList[0].title | truncate(0, 16)}} </p>
              <p class="subtitle fa" v-html="blogList[0].description.substring(0, 99)"> </p>
          </article>
           </router-link>
          

             <router-link :to="{name: 'post', params: {slug: blogList[1].slug}}" v-if="blogList[1]"  class="tile is-child notification is-info blog border_curve">
              <article >
              <p class="title fa"> {{ blogList[1].title | truncate(0, 16)}} </p>
              <p class="subtitle fa" v-html="blogList[1].description.substring(0, 99)"> </p>
            </article>
            </router-link>


        </div>
        <div class="tile is-parent">

             <router-link :to="{name: 'post', params: {slug: blogList[2].slug}}" v-if="blogList[2]"  class="tile is-child notification is-info blog border_curve">
              <article >
              <p class="title fa"> {{ blogList[2].title | truncate(0, 16)}} </p>
              <p class="subtitle fa" v-html="blogList[2].description.substring(0, 350)"> </p>
          <!--figure class="image is-4by3">
            <img src="../../../images/placeholders/640x480.png">
          </figure-->
        </article>
        </router-link>

    </div>
  </div>
  <div class="tile is-parent">



  </div>
</div>
<div class="tile is-parent">
  
             <router-link :to="{name: 'post', params: {slug: blogList[4].slug}}" v-if="blogList[4]"  class="tile is-child notification is-danger border_curve blog">
      <div class="content">
        <p class="title"> {{ blogList[4].title | truncate(0, 18) }}</p>
        <p class="subtitle fa" v-html="blogList[4].description.substring(0, 350)"> </p>
        <!--div class="content">
           // Content 
         </div-->
       </div>
     </router-link>
 </div>

</div> <!-- Ancestors tag close -->

<div class="buttons is-centered" v-if="pagination.total > 5">
  <span class="button is-success border_curve" @click="postsData(pagination.previousPageUrl)"> Previous </span>
  <span class="button is-info border_curve"> {{ pagination.to }} of {{pagination.total}} </span>
  <span class="button is-danger border_curve" @click="postsData(pagination.nextPageUrl)"> Next </span>
</div>



</div> <!-- Container tag close -->

</template>


<script>

export default {

  data() {
    return{

      blogList: [],

      pagination: {
        nextPageUrl: null,
        previousPageUrl: null, 
        to: null,
        total: null,
      },

    }
  },

  mounted() {
    this.postsData()
  },

  methods: {

    postsData(api) {
      let api_url = api || "/api/blog"
      this.axios
      .get(api_url).then((response) => {
        this.blogList = response.data.data

        //document.getElementById('mylocation').innerHTML = response.data.data.description

        let nextPageUrl = response.data.next_page_url
        this.pagination.nextPageUrl = nextPageUrl ? nextPageUrl.slice(21) : null

        let previousPageUrl = response.data.prev_page_url
        this.pagination.previousPageUrl =  previousPageUrl ? previousPageUrl.slice(21) : null

        this.pagination.to = response.data.to
        this.pagination.total = response.data.total
      })
    }
  }, // Method calibrace closes


}

</script>
