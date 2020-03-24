<template>


  <nav class="navbar" role="navigation" aria-label="main navigation">

    <div class="navbar-brand is_hidden_mobile_tablet" style="margin-left: 4px;">
      <router-link :to="{name: 'dashboard'}" class="is-size-4 is-bold navbar-item has-text-success fa" active-class='is-active' exact>
        Purple-Board
      </router-link>
    </div> 

    <!-- Mobile interface code goes here -->
    <nav class="level is-mobile is-hidden-desktop is-hidden-fullhd">

      <div class="is-bold" style="margin-left: 5px">
        <router-link :to="{name: 'dashboard'}" class="is-size-4 has-text-success fa" active-class='is-active' exact>
          Purple-Board
        </router-link>
      </div>

      <!-- Mobile interface code goes here -->
      <drop-down-envelope class='nav_icon_mobile'> </drop-down-envelope>
      <drop-down-bell class='nav_icon_mobile'> </drop-down-bell>
      <drop-down-user class='nav_icon_mobile'> </drop-down-user>

    </nav>

    <div class="navbar-end  is_hidden_mobile_tablet">
      <div class="navbar-item">
      <drop-down-envelope class="navbar-link"> </drop-down-envelope>
      <drop-down-bell class="navbar-link"> </drop-down-bell>
      <drop-down-user class="navbar-link"> </drop-down-user>
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





































