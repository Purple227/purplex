<template>


  <nav class="navbar" role="navigation" aria-label="main navigation">

    <div class="navbar-brand is_hidden_mobile_tablet">
      <router-link :to="{name: 'dashboard'}" class="is-size-4 is-bold navbar-item has-text-success" active-class='is-active' exact>
        Dashboard
      </router-link>
    </div> 

    <!-- Mobile interface code goes here -->
    <nav class="level is-mobile is-hidden-desktop is-hidden-fullhd">

      <div class="is-bold" style="margin-left: 5px">
        <router-link :to="{name: 'dashboard'}" class="is-size-4 has-text-success" active-class='is-active' exact>
          Dashboard
        </router-link>
      </div>

      <drop-down-envelope> </drop-down-envelope>
      <drop-down-bell> </drop-down-bell>
      <drop-down-user> </drop-down-user>

    </nav>


    <!-- Mobile interface code goes here -->

    <div class="navbar-end is_hidden_mobile_tablet">
      <div class="navbar-item">

        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-item">
           <i class="fas fa-envelope">  <span class="notify_dot"> . </span>  </i>        
         </a>

         <div class="navbar-dropdown">

          <a class="navbar-item">
            About
          </a>
          <a class="navbar-item">
            Jobs
          </a>
          <a class="navbar-item">
            Contact
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Report an issue
          </a>

        </div>
      </div>


      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-item">
         <i class="fas fa-bell">  <span class="notify_dot"> . </span>  </i>        
       </a>

       <div class="navbar-dropdown">

        <a class="navbar-item">
          About
        </a>
        <a class="navbar-item">
          Jobs
        </a>
        <a class="navbar-item">
          Contact
        </a>
        <hr class="navbar-divider">
        <a class="navbar-item">
          Report an issue
        </a>

      </div>
    </div>


    <div class="navbar-item has-dropdown is-hoverable">
      <a class="navbar-item">
       <i class="fas fa-user"> </i>        
     </a>

     <div class="navbar-dropdown">
      <a class="navbar-item">
        About
      </a>
      <a class="navbar-item">
        Jobs
      </a>
      <a class="navbar-item">
        Contact
      </a>
      <hr class="navbar-divider">
      <a class="navbar-item">
        Report an issue
      </a>
    </div>
  </div>


</div>
</div>

</nav>


</template>


<script>
import DynamicClassHandler from '../../../mixins/dynamic-class-handler'

import DropDownEnvelope from './drop-down/drop-down-envelope.vue'
import DropDownBell from './drop-down/drop-down-bell.vue'
import DropDownUser from './drop-down/drop-down-user.vue'


export default{

  components: {
    'drop-down-envelope': DropDownEnvelope,
    'drop-down-bell': DropDownBell,
    'drop-down-user': DropDownUser,
  },


  mixins: [
  DynamicClassHandler
  ],


  data() {
    return{

    }
  },

}
</script>





































