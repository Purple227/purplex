<template>

<div class="container container_mobile"> <!-- Container tag start -->
		
<div class="tile is-ancestor"> <!-- Ancestors tag open-->

  <div class="tile is-vertical is-8">
    <div class="tile">
      <div class="tile is-parent is-vertical">

        <article class="tile is-child notification is-primary" v-if="blogList[0]">
          <p class="title fa"> {{ blogList[0].title | truncate(0, 16)}} </p>
          <p class="subtitle fa"> {{ blogList[0].description | truncate(0, 100)}} </p>
        </article>

        <article class="tile is-child notification is-warning" v-if="blogList[1]">
          <p class="title fa"> {{ blogList[1].title | truncate(0, 16)}} </p>
          <p class="subtitle fa"> {{ blogList[1].description | truncate(0, 100)}} </p>
        </article>

      </div>
      <div class="tile is-parent">

        <article class="tile is-child notification is-info" v-if="blogList[2]">
          <p class="title fa"> {{ blogList[2].title | truncate(0, 16)}} </p>
          <p class="subtitle fa"> {{ blogList[1].description | truncate(0, 300)}} </p>
          <!--figure class="image is-4by3">
            <img src="../../../images/placeholders/640x480.png">
          </figure-->
        </article>

      </div>
    </div>
    <div class="tile is-parent">

      <article class="tile is-child notification is-danger" v-if="blogList[3]">
        <p class="title fa"> {{ blogList[3].title | truncate(0, 25)}} </p>
        <p class="subtitle fa"> {{ blogList[3].description | truncate(0, 300)}} </p>
        <div class="content">
          <!-- Content -->
        </div>
      </article>

    </div>
  </div>
  <div class="tile is-parent">

    <article class="tile is-child notification is-success" v-if="blogList[4]">
      <div class="content">
        <p class="title"> {{ blogList[4].title | truncate(0, 18) }}</p>
        <p class="subtitle fa"> {{ blogList[4].description | truncate(0, 450) }} </p>
        <div class="content">
          <!-- Content -->
        </div>
      </div>

    </article>
  </div>

</div> <!-- Ancestors tag close -->

<div class="buttons is-centered">
  <span class="button is-success" @click="postsData(pagination.previousPageUrl)"> Previous </span>
  <span class="button is-info"> {{ pagination.to }} of {{pagination.total}} </span>
  <span class="button is-danger" @click="postsData(pagination.nextPageUrl)"> Next </span>
</div>


	</div> <!-- Container tag close -->

</template>


<script>

export default {

  data() {
    return{

      blogList: null,
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
      let api_url = api || "/api/admin/post"
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

  computed: {
    // a computed getter
    arrayWatcher: function () {
      // `this` points to the vm instance
      return this.blogList[4]
    }
  }


}

</script>
