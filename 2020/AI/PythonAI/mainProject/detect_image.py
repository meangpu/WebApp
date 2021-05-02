import numpy as np
import cv2
import pickle


REGCONIZE_READ_FROM = "face-trainner.yml"
IMAGE_PATH = "sourceFile/image.jpg"
SCALE_FACTOR = 1.2
CONFINDENCE_RATE = 30

face_cas = cv2.CascadeClassifier('data/haarcascade_frontalface_alt2.xml')
recognizer = cv2.face.LBPHFaceRecognizer_create()
recognizer.read(REGCONIZE_READ_FROM)

labels = {}
with open("face-labels.pickle", 'rb') as f:
    og_labels = pickle.load(f)
    labels = {v: k for k, v in og_labels.items()}

image = cv2.imread(IMAGE_PATH)
gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
faces = face_cas.detectMultiScale(gray, scaleFactor=SCALE_FACTOR, minNeighbors=5)

# Draw a rectangle around the faces
for (x, y, w, h) in faces:
    roi_gray = gray[y:y + h, x:x + w]
    cv2.rectangle(image, (x, y), (x + w, y + h), (0, 255, 0), 2)
    id_, conf = recognizer.predict(roi_gray)
    if conf >= CONFINDENCE_RATE:
        print(id_)
        print(labels[id_])
        font = cv2.FONT_HERSHEY_SIMPLEX
        name = labels[id_]
        color = (255, 255, 255)
        color_black = (0, 0, 0)

        stroke = 2
        stroke_out = 6
        cv2.putText(image, name, (x, y), font, 0.75, color_black, stroke_out, cv2.LINE_AA)
        cv2.putText(image, name, (x, y), font, 0.75, color, stroke, cv2.LINE_AA)

print("Found {0} faces!".format(len(faces)))
cv2.imshow("Faces found", image)
cv2.waitKey(0)
