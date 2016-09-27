<template>
  <div class="panel panel-default">
    <div class="panel-heading">
      <nav>
        <ul class="list-inline">
          <li><a v-link="{ name: 'home' }">Home</a></li>
          <li><a v-link="{ name: 'topic.new' }">Post a topic</a></li>

          <li class="pull-right" v-if="!auth.user.authenticated">
            <a v-link="{ name: 'auth.signin' }">Sign in</a>
          </li>
          <li class="pull-right" v-if="!auth.user.authenticated">
            <a v-link="{ name: 'auth.signup' }">Sign up</a>
          </li>
          <li class="pull-right" v-if="auth.user.authenticated">
            <a href="#" v-on:click="signout">Sign out</a>
          </li>
          <li class="pull-right" v-if="auth.user.authenticated">
            Hi, {{ auth.user.profile.username }}!
          </li>
        </ul>
      </nav>
    </div>
    <div class="panel-body">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
  import auth from '../auth'

  export default {
    data () {
      return {
        auth: auth
      }
    },
    methods: {
      signout () {
        auth.signout()
      }
    },
    ready () {
      auth.check()
    }
  }
</script>
