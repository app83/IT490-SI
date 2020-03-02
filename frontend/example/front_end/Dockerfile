FROM ubuntu:18.04
RUN apt-get update -y && \
    apt-get install -y python-pip python-dev
EXPOSE 5000
COPY . /app
WORKDIR /app
RUN pip install -r requirements.txt
ENV FLASK_APP=app.py
CMD ["flask", "run", "--host=0.0.0.0"]
