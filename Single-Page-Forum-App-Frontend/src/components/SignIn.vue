<template>
  <div class="alert alert-danger" v-if="error">
    <p>Could not sign you in with those details.</p>
  </div>
  <form autocomplete="off" v-on:submit="signin">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" class="form-control" placeholder="you@somewhere.com" v-model="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" class="form-control" v-model="password" required>
    </div>
    <button type="submit" class="btn btn-default">Sign in</button>
  </form>
</template>

<script>
  import auth from '../auth'

  export default {
    data () {
      return {
        email: null,
        password: null,
        error: false
      }
    },
    methods: {
      signin (e) {
        e.preventDefault()
        auth.signin(this, this.email, this.password)
      }
    }
  }
</script>
