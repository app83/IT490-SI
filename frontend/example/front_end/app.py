# from flask import Flask
# app = Flask(__name__)

# @app.route('/')
# def hello_world():
#         return 'Hello, World!'
from flask import Flask, render_template
app = Flask(__name__, root_path='ui_template/') 
   
 @app.route('/')
# render home page 
def index():
        return render_template('login.html')     
if __name__ == '__main__':  
   app.run(debug = True) 