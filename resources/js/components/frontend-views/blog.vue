<template>

<div class="container container_mobile"> <!-- Container tag start -->
		
<div class="tile is-ancestor"> <!-- Ancestors tag open-->

  <div class="tile is-vertical is-8">
    <div class="tile">
      <div class="tile is-parent is-vertical">

       
        <article class="tile is-child notification is-primary border_curve" v-if="blogList[0]">
           <router-link :to="{name: 'post', params: {slug: blogList[0].slug}}">
          <p class="title fa"> {{ blogList[0].title | truncate(0, 16)}} </p>
          <p class="subtitle fa"> {{ blogList[0].description | truncate(0, 99)}} </p>
          </router-link>
        </article>
        

        <article class="tile is-child notification is-warning border_curve" v-if="blogList[1]">
          <router-link :to="{name: 'post', params: {slug: blogList[1].slug}}">
          <p class="title fa"> {{ blogList[1].title | truncate(0, 16)}} </p>
          <p class="subtitle fa"> {{ blogList[1].description | truncate(0, 99)}} </p>
        </router-link>
        </article>


      </div>
      <div class="tile is-parent">

        <article class="tile is-child notification is-info border_curve" v-if="blogList[2]">
          <router-link :to="{name: 'post', params: {slug: blogList[2].slug}}">
          <p class="title fa"> {{ blogList[2].title | truncate(0, 16)}} </p>
          <p class="subtitle fa"> {{ blogList[2].description | truncate(0, 350)}} </p>
          <!--figure class="image is-4by3">
            <img src="../../../images/placeholders/640x480.png">
          </figure-->
        </router-link>
        </article>

      </div>
    </div>
    <div class="tile is-parent">

      <article class="tile is-child notification is-danger border_curve" v-if="blogList[3]">
        <router-link :to="{name: 'post', params: {slug: blogList[3].slug}}">
        <p class="title fa"> {{ blogList[3].title | truncate(0, 25)}} </p>
        <p class="subtitle fa"> {{ blogList[3].description | truncate(0, 300)}} </p>
        <div class="content">
          <!-- Content -->
        </div>
      </router-link>
      </article>

    </div>
  </div>
  <div class="tile is-parent">
    
    <article class="tile is-child notification is-success border_curve" v-if="blogList[4]">
      <router-link :to="{name: 'post', params: {slug: blogList[4].slug}}">
      <div class="content">
        <p class="title"> {{ blogList[4].title | truncate(0, 18) }}</p>
        <p class="subtitle fa"> {{ blogList[4].description | truncate(0, 520) }} </p>
        <!--div class="content">
           // Content 
        </div-->
      </div>
    </router-link>
    </article>
  </div>

</div> <!-- Ancestors tag close -->

<div class="buttons is-centered">
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
      test: null,

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
