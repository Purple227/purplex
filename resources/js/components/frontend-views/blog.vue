<template>

  <div class="container container_mobile"> <!-- Container tag start -->

    <skeleton-card actions round hover isLoading v-if="loader" class="border_curve"></skeleton-card>    



    <div class="columns" v-else>

      <div class="column is-9">

        <div class="columns is-multiline">
          <div class="column is-6" v-for="blog in blogList">

            <div class="card border_curve">
              <header class="card-header">
                <p class="card-header-title">
                  {{ blog.title.substring(0, 30) }} 
                </p>
              </header>
              <div class="card-content">
                <div class="content">
                  <p class="subtitle" v-html="blog.description.substring(0, 86)"> </p>

                  <time :datetime="blog.edited ? blog.updated_at : blog.created_at">Posted: {{ blog.edited ? blog.updated_at : blog.created_at | format('D MMM YYYY - h:mm A') }} </time>
                </div>
              </div>
              <footer class="card-footer border_curve is-dark">
                <router-link :to="{name: 'post', params: {slug: blog.slug}}" class="card-footer-item has-text-white"> Read More </router-link>
              </footer>
            </div>

          </div>

        </div>



    <div class="buttons is-centered" v-if="pagination.total > 4">
      <span class="button is-warning border_curve" @click="postsData(pagination.previousPageUrl)"> Previous </span>
      <span class="button is-info border_curve"> {{ pagination.to }} of {{pagination.total}} </span>
      <span class="button is-danger border_curve" @click="postsData(pagination.nextPageUrl)"> Next </span>
    </div>


      </div>

      <div class="column is-3">

        Second column

      </div>

    </div>






  </div> <!-- Container tag close -->

</template>


<script>
import SkeletonCard from 'vue-skeleton-screen';


export default {

   metaInfo: {
      title: 'Blogs',
      htmlAttrs: {
        lang: 'en',
        amp: true
      }
    },

  components: {
    SkeletonCard,
  },


  data() {
    return{

      blogList: [],
      loader: true,

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

        this.loader = false

      })
    }
  }, // Method calibrace closes


}

</script>
