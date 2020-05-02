<template>

  <div class="container container_mobile"> <!-- Container tag start -->

    <div class="buttons is-centered" v-if="pagination.total > 5">
      <span class="button is-success border_curve" @click="postsData(pagination.previousPageUrl)"> Previous </span>
      <span class="button is-info border_curve"> {{ pagination.to }} of {{pagination.total}} </span>
      <span class="button is-danger border_curve" @click="postsData(pagination.nextPageUrl)"> Next </span>
    </div>

    <div class="tile is-ancestor">
      <div class="tile is-vertical is-8">
        <div class="tile">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child notification is-primary border_curve">
              <p class="title" v-html=" blogList[0].title.substring(0, 16) "> </p>
              <p class="subtitle" v-html="blogList[0].description.substring(0, 54)">  </p>
              <div class="buttons has-addons is-centered">
                <router-link :to="{name: 'post', params: {slug: blogList[0].slug}}" class="button"> Read more </router-link> 
              </div>
            </article>

            <article class="tile is-child notification is-warning border_curve">
              <p class="title" v-html=" blogList[1].title.substring(0, 16) "> </p>
              <p class="subtitle" v-html="blogList[1].description.substring(0, 54)">  </p>
              <div class="buttons has-addons is-centered">
                <router-link :to="{name: 'post', params: {slug: blogList[1].slug}}" class="button"> Read more </router-link> 
              </div>
            </article>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child notification is-info border_curve">
              <p class="title" v-html=" blogList[2].title.substring(0, 16) "> </p>
              <p class="subtitle" v-html="blogList[2].description.substring(0, 400)">  </p>
              <div class="buttons has-addons is-centered">
                <router-link :to="{name: 'post', params: {slug: blogList[2].slug}}" class="button"> Read more </router-link> 
              </div>
            </article>
          </div>
        </div>
        <div class="tile is-parent">
          <article class="tile is-child notification is-danger border_curve">
            <p class="title has-text-centered" v-html=" blogList[3].title.substring(0, 15) "> </p>
            <p class="subtitle" v-html="blogList[3].description.substring(0, 140)">  </p>
            <div class="buttons has-addons is-centered">
              <router-link :to="{name: 'post', params: {slug: blogList[3].slug}}" class="button"> Read more </router-link> 
            </div>
          </article>
        </div>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification is-success border_curve">
          <div class="content">
            <p class="title">AD Space</p>
            <p class="subtitle"> Google advertisement space</p>
            <div class="content">
              <p> ads content just incase</p>
            </div>
          </div>
        </article>
      </div>
    </div>

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
      loading: true,

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
    //this.loading = false
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
