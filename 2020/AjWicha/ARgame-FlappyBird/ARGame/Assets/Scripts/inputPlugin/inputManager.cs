using UnityEngine;

public class inputManager : MonoBehaviour
{
    private TouchControl touchControls;
    void Awake()
    {
        touchControls = new TouchControl();
    }

    void OnEnable()
    {
        touchControls.Enable();
    }
    void OnDisable()
    {
        touchControls.Disable();
    }
}
