<?php
namespace App\Http\Controllers;

class LoginController extends Controller
{
 public function showLoginForm()
 {
  return view('login');
 }
 public function login(Request $request)
 {
  $credentials = $request->only('email', 'password');

  if (! $token = auth()->attempt($credentials)) {
   return back()->withErrors(['Invalid credentials']);
  }

  $url = 'http://127.0.0.1:8000/auth/external-login?token=' . $token;
  return redirect($url);
 }

 public function logout()
 {
  auth()->logout();
  return redirect('http://127.0.0.1:8000/logout?redirect=http://ecommerce.test/login');
 }
}
