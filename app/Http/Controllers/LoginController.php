<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
 public function showLoginForm()
 {
  return view('login');
 }
 public function login(Request $request)
 {
  $request->validate([
   'email'    => 'required|email',
   'password' => 'required|min:6',
  ]);
  $credentials = $request->only('email', 'password');

  if (! $token = auth('api')->attempt($credentials)) {
   return back()->withErrors(['Invalid credentials']);
  }
  $user = auth('api')->user();
  auth('web')->login($user);
  $url = 'http://127.0.0.1:8001/auth/external-login?token=' . $token;
  return redirect($url);
 }

 public function logout()
 {
  auth('web')->logout();
  auth('api')->logout();
  return redirect('http://127.0.0.1:8001/logout?redirect=http://127.0.0.1:8000/');
 }
}
