import io
import json
import requests
from flask import Flask, render_template, request


app = Flask(__name__)


@app.route('/')
def home():
   return render_template('upload.html')


@app.route('/uploader', methods = ['POST'])
def upload_file():
    # Check if the request is post or not.
    # If not post, then return invalid request.
    if request.method != 'POST': return 'Invalid request'
    
    f = request.files.get('file', None)
    # Check if the request contains the desired
    # file field or not.
    if f is None: return 'No file submitted'
    
    # Check for file type. Should be an image.
    allowed_extensions = ['jpg', 'jpeg', 'png']
    if f.filename.split('.')[-1] not in allowed_extensions: return 'Invalid filetype'
    
    # Get the file bytes, make api request and process the result.
    file_bytes =  io.BytesIO(f.read())
    url_api = "https://api.ocr.space/parse/image"

    result = requests.post(
        url_api,
        files={ 
            f.filename: file_bytes 
        },
        data={
            "apikey": "helloworld",
             "language": "eng"
        }
    )

    result = result.content.decode()
    result = json.loads(result)

    parsed_results = result.get("ParsedResults")[0]
    text_detected = parsed_results.get("ParsedText")
    
    return text_detected

if __name__ == '__main__':
   app.run(debug = True)
