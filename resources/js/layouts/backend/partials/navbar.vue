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


      <div class="dropdown level-item" v-bind:class="{ 'is-active': !isActive }" v-on:click="isActive = !isActive">
        <div class="dropdown-trigger">
          <i class="fas fa-envelope">  <span class="notify_dot"> . </span>  </i>
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


      <div class="dropdown level-item" v-bind:class="{ 'is-active': !isActive }" v-on:click="isActive = !isActive">
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



      <div class="dropdown level-item">
        <div class="dropdown-trigger">
          <i class="fas fa-user"> </i>
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





































