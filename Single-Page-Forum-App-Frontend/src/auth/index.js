import Vue from '../main'
import {router} from '../main'

export default {
  user: {
    authenticated: false,
    profile: null
  },
  check () {
    if (localStorage.getItem('id_token') !== null) {
      Vue.http({
        url: 'user',
        method: 'GET'
      }).then(response => {
        this.user.authenticated = true
        this.user.profile = response.data.data
      })
    }
  },
  signin (context, email, password) {
    Vue.http({
      url: 'auth/signin',
      method: 'POST',
      data: {
        email: email,
        password: password
      }
    }).then(response => {
      context.error = false
      localStorage.setItem('id_token', response.data.meta.token)
      Vue.http.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token')

      this.user.authenticated = true
      this.user.profile = response.data.data

      router.go({
        name: 'home'
      })
    }, response => {
      context.error = true
    })
  },
  signup (context, email, username, password) {
    Vue.http({
      url: 'auth/signup',
      method: 'POST',
      data: {
        email: email,
        username: username,
        password: password,
      }
    }).then(response => {
      context.success = true
    }, response => {
      context.response = response.data
      context.error = true
    })
  },
  signout () {
    localStorage.removeItem('id_token')
    this.user.authenticated = false
    this.user.profile = null

    router.go({
      'name': 'home'
    })
  }
}
