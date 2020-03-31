<template>

	<div class="container container_mobile"> <!-- Container tag start -->
		
<div class="tile is-ancestor"> <!-- Ancestor tag open -->

  <div class="tile is-vertical is-8">
    <div class="tile">
      <div class="tile is-parent is-vertical">
        <article class="tile is-child notification is-primary">
          <p class="title">Vertical...</p>
          <p class="subtitle">Top tile</p>
        </article>
        <article class="tile is-child notification is-warning">
          <p class="title">...tiles</p>
          <p class="subtitle">Bottom tile</p>
        </article>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification is-info">
          <p class="title">Middle tile</p>
          <p class="subtitle">With an image</p>
          <figure class="image is-4by3">
            <img src="/images/profile_pic.jpg">
          </figure>
        </article>
      </div>
    </div>
    <div class="tile is-parent">
      <article class="tile is-child notification is-danger">
        <p class="title">Wide tile</p>
        <p class="subtitle">Aligned with the right tile</p>
        <div class="content">
          <!-- Content -->
        </div>
      </article>
    </div>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child notification is-success">
      <div class="content">
        <p class="title">Tall tile</p>
        <p class="subtitle">With even more content</p>
        <div class="content">
          <!-- Content -->
        </div>
      </div>
    </article>
  </div>

</div>  <!-- Ancestor tag close -->


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
        console.log(this.blogList)

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
