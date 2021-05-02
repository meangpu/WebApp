import numpy as np
import cv2
import pickle
import time

SLOW_NUM = 0.05
REGCONIZE_READ_FROM = "face-trainner.yml"
IMAGE_PATH = "sourceFile/testVideo.mp4"
CONFINDENCE_RATE = 60
SCALE_FACTOR = 1.1
logfile = open("logging.txt", "w")


face_cas = cv2.CascadeClassifier('data/haarcascade_frontalface_alt2.xml')
recognizer = cv2.face.LBPHFaceRecognizer_create()
recognizer.read(REGCONIZE_READ_FROM)

labels = {}
with open("face-labels.pickle", 'rb') as f:
    og_labels = pickle.load(f)
    labels = {v: k for k, v in og_labels.items()}

cap = cv2.VideoCapture(IMAGE_PATH)
frameNum = 0

while cap.isOpened():
    success, img = cap.read()
    if success:
        frameNum = frameNum + 1
        gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

        faces = face_cas.detectMultiScale(gray, scaleFactor=SCALE_FACTOR, minNeighbors=5)
        if len(faces) > 0:

            logfile.write(str(frameNum))

            # Draw a rectangle around the faces
            for (x, y, w, h) in faces:
                roi_gray = gray[y:y + h, x:x + w]
                cv2.rectangle(img, (x, y), (x + w, y + h), (0, 255, 0), 2)
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
                    cv2.putText(img, name, (x, y), font, 0.75, color_black, stroke_out, cv2.LINE_AA)
                    cv2.putText(img, name, (x, y), font, 0.75, color, stroke, cv2.LINE_AA)
                    logfile.write(',' + f"({x},{y},{w},{h}, '{labels[id_]}')")
            logfile.write("\n")

            cv2.imshow("Video", img)
            time.sleep(SLOW_NUM)
        else:
            cv2.imshow("Video", img)

    else:
        print("Video closed")
        break
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break
