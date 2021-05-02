using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class switchCamera : MonoBehaviour
{

    public bool Is_AR = false;
    public GameObject arSessionOrigin;
    public GameObject arSession;
    public GameObject mainCamera;

    public GameObject selectChar;
    public GameObject inARMode;
    public GameObject beforeStart;


    public void changeMode()
    {
        if (Is_AR)
        {
            arSessionOrigin.SetActive(false);
            arSession.SetActive(false);
            mainCamera.SetActive(true);
            Is_AR = false;
        }
        else
        {
            arSessionOrigin.SetActive(true);
            arSession.SetActive(true);
            mainCamera.SetActive(false);
            Is_AR = true;
        }
    }

    public void GetIntoAR()
    {
        selectChar.SetActive(false);
        beforeStart.SetActive(false);
        inARMode.SetActive(true);

        arSessionOrigin.SetActive(true);
        arSession.SetActive(true);
        mainCamera.SetActive(false);
        Is_AR = true;
    }


    public void ExitAR()
    {
        selectChar.SetActive(true);
        beforeStart.SetActive(true);
        inARMode.SetActive(false);

        arSessionOrigin.SetActive(false);
        arSession.SetActive(false);
        mainCamera.SetActive(true);
        Is_AR = false;
    }
}
