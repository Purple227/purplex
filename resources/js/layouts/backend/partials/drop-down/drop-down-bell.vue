
<template>
  
      <div class="dropdown level-item is-right" v-bind:class="{ 'is-active': isActive }" v-on-clickaway="away" @click="addActiveClass">
        <div class="dropdown-trigger">
          <i class="fas fa-bell">  <span class="notify_dot"> . </span>  </i>  
        </div>

        <div class="dropdown-menu" id="dropdown-menu3" role="menu">
          <div class="dropdown-content">
            <a href="#" class="dropdown-item">
              Overview
            </a>
            <a href="#" class="dropdown-item">
              Modifiers
            </a>
            <a href="#" class="dropdown-item">
              Grid
            </a>
            <a href="#" class="dropdown-item">
              Form
            </a>
          </div>
        </div>
      </div>

</template>


<script>

import DynamicClassHandler from '../../../../mixins/dynamic-class-handler'

export default{

  mixins: [
  DynamicClassHandler
  ],


  data() {
    return{

    }
  },

}

</script>
