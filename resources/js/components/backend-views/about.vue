
<template>

<div class="card about ">
  <header class="card-header">
    <p class="card-header-title  title is-4 is-centered has-text-primary">
      Purple-Board
    </p>
  </header>
  <div class="card-content has-text-centered has-text-white">
    <div class="content">
    	<strong class="has-text-white"> Purple-Board is a mini dashboard build for managing oneself content as i find other open source dashboard too combustion for my personal need.</strong> <br> 
      Copyright © 2020 - {{todayDate | format('YYYY') }} 

    </div>
  </div>
<!--   <footer class="card-footer">
    <a href="#" class="card-footer-item">Save</a>
    <a href="#" class="card-footer-item">Edit</a>
    <a href="#" class="card-footer-item">Delete</a>
  </footer> -->
</div>


</template>

<script>

export default {

	data() {
		return {
			todayDate: new Date(),
		}
	},



}
</script>

