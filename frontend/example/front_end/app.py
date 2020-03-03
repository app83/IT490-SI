# from flask import Flask
# app = Flask(__name__)

# @app.route('/')
# def hello_world():
#         return 'Hello, World!'
from flask import *  
app = Flask(__name__)  
 
@app.route('/')  
def message():  
      return render_template('login.html')  
if __name__ == '__main__':  
   app.run(debug = True) 