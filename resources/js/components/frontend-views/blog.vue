<template>

<div class="container container_mobile"> <!-- Container tag start -->
		
<div class="tile is-ancestor"> <!-- Ancestor tag open -->

  <div class="tile is-vertical is-8">
    <div class="tile">
      <div class="tile is-parent is-vertical">
        <article class="tile is-child notification is-primary">
          <p class="title"> {{blogList[0].title | truncate(0, 15) }} </p>
          <p class="subtitle"> {{blogList[0].description | truncate(0, 80)}} </p>
          <a class="button is-small is-fullwidth bold">Read More</a>
        </article>
        <article class="tile is-child notification is-warning">
          <p class="title"> {{blogList[1].title | truncate(0, 15) }}</p>
          <p class="subtitle"> {{blogList[1].description | truncate(0, 80) }} </p>
          <a class="button is-small is-fullwidth bold">Read More</a>
        </article>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification is-info">
          <p class="title"> {{blogList[2].title | truncate(0, 15) }}</p>
          <p class="subtitle"> {{blogList[2].description | truncate(0, 250) }} </p>
          <a class="button is-small is-fullwidth bold">Read More</a>
        </article>
      </div>
    </div>
    <div class="tile is-parent">
      <article class="tile is-child notification is-danger">
        <p class="title has-text-centered"> {{blogList[3].title | truncate(0, 25) }} </p>
        <p class="subtitle"> {{blogList[3].description | truncate(0, 150) }}  </p>
        <a class="button is-small is-fullwidth bold">Read More</a>
      </article>
    </div>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child notification is-success">
      <div class="content">
        <p class="title"> {{blogList[4].title | truncate(0, 15) }} </p>
        <p class="subtitle"> {{ blogList[4].description | | truncate(0, 350) }} </p>
        <a class="button is-small is-fullwidth bold">Read More</a>
      </div>
    </article>
  </div>

</div>  <!-- Ancestor tag close -->

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


}

</script>
